<?php

class Document_ImportController extends Zend_Controller_Action {

    /**
     * @url http://web-tools.local/doc/excel_import
     */
    public function excelImportAction() {
        echo '<br />Excel Import action - Document';
    }
    
    /**
     * @url http://web-tools.local/doc/pdf_import
     */
    public function pdfImportAction() {
        echo '<br />PDF Import action - Document';
    }

    /**
     * @url http://web-tools.local/doc/csv_import
     */
    public function csvImportAction() {
        echo '<br />csv Import action - Document';
    }
}

?>
