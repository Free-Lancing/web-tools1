<?php

class Document_ExportController extends Zend_Controller_Action {

    /**
     * @url http://web-tools.local/doc/excel_export
     */
    public function excelExportAction() {
        echo '<br />Excel Export action - Document';
    }

    /**
     * @url http://web-tools.local/doc/pdf_export
     */
    public function pdfExportAction() {
        echo '<br />PDF Export action - Document';
    }

    /**
     * @url http://web-tools.local/doc/csv_export
     */
    public function csvExportAction() {
        echo '<br />csv Export action - Document';
    }

}

?>
