<style type="text/css">
    .printdata , .print{
        display: none;
    }
    @media print{
        @page{
            margin:-30px 0 0 0;
        }
        a[href]:after{
            content: none !important;
        }
        header-fixed-top , header , .block-header , .breadcrumb , .row , footer{
            display: none;
        }
        .printdata{
            display: contents;
        }
        .pdata , .pdata th{
            font-size:20px;
        }

    /* For removing element from Print View */
    .print_ignore {
        display: none;
    }

    .nowrap {
        white-space: nowrap;
    }

    .hide {
        display: none;
    }

    /* Standard CSS */
    body, table, th, td {
        color:#000;
        background-color:  #fff;
        font-size: 12px;
    }

    /* To remove link text decoration */
    a:link {
        color:#000;
        text-decoration:none
    }

    /* To remove any image borders */
    img {
        border: 0;
    }

    /* Table specific */
    table, th{
        border-top: .2em solid rgb(232,232,232);
        background-color: #fff;
    }
    th:first-child{
        border-left: .2em solid rgb(232,232,232);
    }
    th:last-child{
        border-right: .2em solid rgb(232,232,232);
    }
    table {
        border-collapse:   collapse;
        border-spacing:    0.2em;
    }
    thead {
        border-collapse:   collapse;
        border-spacing: 0.2em;
        border: .1em solid #F9F9F9;
        font-weight: 900;
    }
    thead th {
        font-weight:       bold;
        background-color:  #e5e5e5;
        border: .1em solid rgb(232,232,232);
    }

    th.vtop, td.vtop {
        vertical-align: top;
    }

    th.vbottom, td.vbottom {
        vertical-align: bottom;
    }

    /* Common Elements not to be included */
    /* Hide Navigation and Top Menu bar */
    #pma_navigation, #floating_menubar {
        display: none;
    }
    /* Hide console */
    #pma_console_container {
        display: none;
    }

    /* Hide Navigation items (like Goto Top) */
    #page_nav_icons {
        display: none;
    }

    /* Hide the Create Table form */
    #create_table_form_minimal {
        display: none;
    }

    /* Hide the Page Settings Modal box */
    #page_settings_modal {
        display: none;
    }

    /* Hide footer, Demo notice, errors div */
    #pma_footer, #pma_demo, #pma_errors {
        display: none;
    }

    /* Hide the #selflink div */
    #selflink {
        display: none;
    }

    /* Position the main content */
    #page_content {
        position: absolute;
        left: 0;
        top: 0;
        width: 95%;
        float: none;
    }

    /* Specific Class for overriding while Print */
    .print {
        background-color: #000;
    }

    /* For the Success message div */
    div.success {
        width: 80%;
        background-color: #fff;
    }

    .sqlOuter {
        color: black;
        background-color: #000;
    }

    /* For hiding 'Open a New phpMyAdmin Window' button */
    .ic_window-new, .ic_s_cog {
        display: none;
    }

    .sticky_columns tr {
        display: none;
    }

    #structure-action-links, #addColumns {
        display: none;
    }

    /* Hide extra menu on tbl_structure.php */
    #topmenu2 {
        display: none;
    }

    .cDrop, .cEdit, .cList, .cCpy, .cPointer {
        display: none;
    }

    /* For Odd-Even contrast */
    table tr.odd th,
    table tr.odd td,
    .odd {
        background: #fff;
    }

    table tr.even th,
    table tr.even td,
    .even {
        background: #dfdfdf;
    }

    .column_attribute {
        font-size: 100%;
    }
    }
</style>
<script >
    function divprint()
    {
        window.print();
    }
</script>
