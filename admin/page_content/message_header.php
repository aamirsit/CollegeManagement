<!DOCTYPE html><?php $n="8"; ?>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<?php include('page_content/head.php') ?>
<body class="header-fixed-top">
<?php include('page_content/left-side.php') ?>
<?php include('page_content/right-side.php') ?>
<div id="page-container" class="full-width">
<?php include('page_content/header.php') ?>
<div id="fx-container" class="fx-opacity"><div id="page-content" class="block">
<div class="block-header">
<div class="row remove-margin">
<div class="col-sm-6">
<a href="#" class="header-title-link">
<h1><i class="icon-envelope-alt animation-expandUp"></i> Message Center<br><small>All your messages in order</small></h1>
</a>
</div>
<div class="col-sm-6">
<div class="row">
<div class="col-xs-6">
<a href="compose.php" class="header-link">
<h1 class="animation-pullDown"><i class="icon-pencil"></i><br><small>Compose Message</small></h1>
</a>
</div>
<div class="col-xs-6">
<a href="javascript:void(0)" class="header-link">
<h1 class="animation-pullDown"><b style="font-weight:400" class="inbox1"></b><br><small>Inbox</small></h1>
</a>
</div>
</div>
</div>
</div>
</div>
<ul class="breadcrumb breadcrumb-top">
<li><i class="icon-bookmark"></i></li>
<li><a href="#">Message Center</a></li>
</ul>
<div class="row gutter30">
<div class="col-md-12">
<div class="row gutter30">
<div class="col-sm-6 col-md-3 block-section ms-categories">
<ul class="nav nav-pills nav-stacked" style="border-left:0px solid black">
<li style="border-left:3px solid black">
<button type="submit" id="inbox" name="inbox" class="btn btn-default" style="width:100%;text-align:left;"><span class="badge pull-right inbox"></span><i class="icon-inbox icon-fixed-width"></i> Inbox</button>
</li>
<li style="border-left:3px solid black">
<button type="submit" id="sent" name="sent" class="btn btn-default" style="width:100%;text-align:left;"><span class="badge pull-right sent"></span><i class="icon-share-alt icon-fixed-width"></i> Sent</button>
</li>
<li style="border-left:3px solid black">
<button type="submit" id="draft" name="draft" class="btn btn-default" style="width:100%;text-align:left;"><span class="badge pull-right draft"></span><i class="icon-suitcase icon-fixed-width"></i> Draft</button>
</li>
<li style="border-left:3px solid black">
<button type="submit" id="trash" name="trash" class="btn btn-default" style="width:100%;text-align:left;"><span class="badge pull-right trash"></span><i class="icon-trash icon-fixed-width"></i> Trash</button>
</li>
</ul>
</div>
<div class="deleted" style="position:absolute;z-index:1;visibility:hidden;opacity:1;transition:all .400s ease-in-out;left:92.5%;top:-10.5%;padding:0 10px 0 10px;background-color:Black">
    <h4 style="color:white">Deleted</h4>
</div>
<script>
    $(document).ready(function(){
        $("#open").load('ajax_page/inbox.php');
       $('.draft').load('ajax_page/draftno.php');
       $('.inbox').load('ajax_page/inboxno.php');
       $('.inbox1').load('ajax_page/inboxno.php');
       $('.sent').load('ajax_page/sentno.php');
       $('.trash').load('ajax_page/trashno.php');
        $("#inbox").click(function(){
           $("#open").load('ajax_page/inbox.php'); 
        }); 
         $("#sent").click(function(){
           $("#open").load('ajax_page/sent.php'); 
        }); 
         $("#draft").click(function(){
           $("#open").load('ajax_page/draft.php'); 
        }); 
         $("#trash").click(function(){
           $("#open").load('ajax_page/trash.php'); 
        }); 
    });
</script>