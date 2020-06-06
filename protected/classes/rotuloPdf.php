<?php
Yii::import('application.extensions.tcpdf.tcpdf');

class rotuloPdf extends tcpdf
{
    
    private $hojaCount=2;    // Cantidad de Items por Hoja
    private $hojaHeight=148;  // Item Alto en mm
    private $hojaItem=0;     // Item que se esta imprimiento 
    private $marcoHeight=138; // Alto del Marco
    private $marcoWidth=195; // Ancho del Marco
    
   
    private $marcoTab0=9;
    private $marcoTab1=37;
    private $marcoTab2=160;
    
    //private $col=0; // Nro de columna
    //private $y0=0;  // posicion de inicio de columna

    public function __construct($orientation='P', $unit='mm', $format='A4', $unicode=true, $encoding='UTF-8', $diskcache=false, $pdfa=false) 
    {
        parent::__construct($orientation, $unit, $format, $unicode, $encoding, $diskcache, $pdfa);

        $this->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $this->SetMargins(7,7,7,7); //PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT
        
        // set auto page breaks
        $this->SetAutoPageBreak(FALSE); // , PDF_MARGIN_BOTTOM);
        
        // set image scale factor
        $this->setImageScale(PDF_IMAGE_SCALE_RATIO);
        
        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $this->setLanguageArray($l);
        }

        $this->setPrintHeader(false);
        $this->setPrintFooter(false);
        
        $this->nuevaPagina(); // Pagina Inicial
        $this->ValoresIniciales();

    }
    
    private function ValoresIniciales()
    { 
     // $rel=$this->getMargins();
     //  $this->marcoWidth = $rel['right'] - $rel['left'];
      $this->hojaItem=-1;
    }
    
    private function nuevaPagina()
    {
      $this->AddPage();
      $this->hojaItem=0;
    }
    
    private function nuevoItem()
    {
      $this->hojaItem++;
      if($this->hojaItem==$this->hojaCount){
        $this->nuevaPagina();
      }
    
    }
    
   
    private function yy($y=0)
    {
      $rel=$this->getMargins();
      return $this->hojaItem * $this->hojaHeight + $y + $rel['top'];  
    }
    
    private function marco()
    {
      $rel=$this->getMargins();
      $this->SetLineStyle(array('width' => 0.2));
      $this->RoundedRect($rel['left'],$this->yy(), $this->marcoWidth, $this->marcoHeight,3);
    
    }
    
    function SetCol($col)
    {
      // Establecer la posición de una columna dada
      $this->col = $col;
      $x = 10+$col*65;
      $this->SetLeftMargin($x);
      $this->SetX($x);
    }

    /*
    function AcceptPageBreak()
    {
    // Método que acepta o no el salto automático de página
      if($this->col<2)
      {
         // Ir a la siguiente columna
         $this->SetCol($this->col+1);
         // Establecer la ordenada al principio
         $this->SetY($this->y0);
         // Seguir en esta página
         return false;
      }
      else
      {
         // Volver a la primera columna
         $this->SetCol(0);
         // Salto de página
         return true;
      }
    }
    */

    private function texto($model)
    {
      if (trim($model->observaciones)) {
        $this->writeTexto($model->observaciones);
      }
    }

    private function writeTexto($txt)
    {
      $padd = $this->getCellPaddings();
      $this->setCellPaddings(10,0,10,0);

      //$txt = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sed imperdiet lectus. Phasellus quis velit velit, non condimentum quam. Sed neque urna, ultrices ac volutpat vel, laoreet vitae augue. Sed vel velit erat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras eget velit nulla, eu sagittis elit. Nunc ac arcu est, in lobortis tellus. Praesent condimentum rhoncus sodales. In hac habitasse platea dictumst. Proin porta eros pharetra enim tincidunt dignissim nec vel dolor. Cras sapien elit, ornare ac dignissim eu, ultricies ac eros. Maecenas augue magna, ultrices a congue in, mollis eu nulla. Nunc venenatis massa at est eleifend faucibus. Vivamus sed risus lectus, nec interdum nunc.';
      //Fusce et felis vitae diam lobortis sollicitudin. Aenean tincidunt accumsan nisi, id vehicula quam laoreet elementum. Phasellus egestas interdum erat, et viverra ipsum ultricies ac. Praesent sagittis augue at augue volutpat eleifend. Cras nec orci neque. Mauris bibendum posuere blandit. Donec feugiat mollis dui sit amet pellentesque. Sed a enim justo. Donec tincidunt, nisl eget elementum aliquam, odio ipsum ultrices quam, eu porttitor ligula urna at lorem. Donec varius, eros et convallis laoreet, ligula tellus consequat felis, ut ornare metus tellus sodales velit. Duis sed diam ante. Ut rutrum malesuada massa, vitae consectetur ipsum rhoncus sed. Suspendisse potenti. Pellentesque a congue massa.';

      $this->SetAutoPageBreak(TRUE, $this->h - $this->yy(110)); // , PDF_MARGIN_BOTTOM);
      $this->setEqualColumns(2,100,$this->yy(70));
      $this->SetY($this->yy(70));
      $this->SetFont('Helvetica', 'I', 10);
      $this->MultiCell(100, 40, $txt, 0, 'L', 0, 1, '', '', true, 0, false, true);//, 40, 'M', true);
    
    // MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
      $this->resetColumns();
      $this->SetAutoPageBreak(FALSE);
      $this->setCellPaddings($padd['L'],$padd['T'],$padd['R'],$padd['B']);
    }

    private function logo()
    {
      // Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)
      $this->Image('images/COS_Logo.png', 18, $this->yy(11), 55, 20, 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    }

    private function fechaDia($fecha)
    {
      $this->SetFont('Helvetica', '', 16);
      $this->SetXY(150, $this->yy(11));
      $this->Cell(30,9,$fecha,0,0,'R');
    }


    
    private function barras($model)
    {
        $style = array(
            'position' => '',
            'align' => 'C',
            'stretch' => false,
            'fitwidth' => true,
            'cellfitalign' => '',
            'border' => false,
            'hpadding' => 'auto',
            'vpadding' => 'auto',
            'fgcolor' => array(0,0,0),
            'bgcolor' => false, //array(255,255,255),
            'text' => true,
            'font' => 'helvetica',
            'fontsize' => 8,
            'stretchtext' => 4
        );

        $codigo = $model->profesional->csoc;
        $this->SetXY(140,$this->yy(18));
        $this->write1DBarcode(trim($codigo), 'C39', '', '', '', 18, 0.4, $style, 'N');   
    }


    private function periodo($model)
    {
      $texto = 'Facturacion '.$model->oPeriodo()->AsText();
      $this->SetFont('Helvetica', '', 16);
      $this->SetXY(20, $this->yy(35));
      $this->Cell(30,9,$texto,0,0,'L');

      $this->SetFont('Helvetica', 'I', 14);
      $this->SetXY(20, $this->yy(42));
      $this->Cell(30,9,'Registro de Recepcion',0,0,'L');

    }

    private function profesional($model)
    {
      $texto = $model->profesional->nombre.'  ('.$model->profesional->username.')';
      $this->SetFont('Helvetica', 'B', 18);
      $this->SetXY(20, $this->yy(55));
      $this->Cell(170,9,$texto,0,0,'C');
    }

    private function recepcionado($model)
    {
      $texto = $model->operador->nombre;
      $this->SetFont('Helvetica', '', 10);
      $this->SetXY(110, $this->yy(115));
      $this->Cell(80,6,'Recepcionado por',0,0,'C');      

      $this->SetFont('Helvetica', '', 15);
      $this->SetXY(110, $this->yy(119));
      $this->Cell(80,6,$texto,0,0,'C');      

    }


    public function rotulo($model)
    {
      $this->nuevoItem();
      $this->marco();
      $this->logo();
      $this->fechaDia($model->fecha);
      $this->barras($model);
      $this->periodo($model);
      $this->profesional($model);
      $this->texto($model);
      $this->recepcionado($model);
    }

  public function ImprimirComprobante($model, $mode='I', $name='rotulo.pdf')
  {
      $this->rotulo($model);
      $this->rotulo($model);
      $this->lastPage();
      $this->Output($name, $mode); 
  }    
}

?>