<?php

class Document_ConversionController extends Zend_Controller_Action {
    /**
     * @url http://web-tools.local/doc/excel_to_pdf
     */
    public function excelToPdfAction() {
        echo '<br />Convert Excel to PDF action - Document';
        // Multiple sheets one pdf
        // Multiple sheets multiple pdf
    }
    
    /**
     * @url http://web-tools.local/doc/pdf_to_png
     */
    public function pdfToPngAction() {
        echo '<br />Convert PDF to PNG action - Document';
    }
    
    /**
     * @url http://web-tools.local/doc/png_to_pdf
     */
    public function pngToPdfAction() {
        echo '<br />Convert PNG to PDF action - Document';
        // Multiple image files to one pdf
        // One image file to one pdf
    }
}

?>
