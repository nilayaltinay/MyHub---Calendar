<?php
/* Smarty version 4.3.1, created on 2023-04-19 07:52:32
  from '/Applications/XAMPP/xamppfiles/htdocs/mac/degiskenler/MyHub/template/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_643f81a0a55326_33340252',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4e5f2587d2148abb508b70b62403c44035a161c7' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/mac/degiskenler/MyHub/template/index.tpl',
      1 => 1681883550,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:weekView.tpl' => 1,
  ),
),false)) {
function content_643f81a0a55326_33340252 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MyHub Calendar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link href="css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link href="template/index.css" rel="stylesheet">

</head>

<body>

  <div class="container mt-5">

    <div class="row" style="padding: 5px;background-color: rgba(0, 0, 0, .03);">
      <div class="switches-container">
        <input type="radio" id="switchMonthly" name="switchPlan" value="weekly" checked="checked" />
        <input type="radio" id="switchWeekly" name="switchPlan" value="monthly" />
        <label for="switchMonthly">Weekly</label>
        <label for="switchWeekly">Monthly</label>
        <div class="switch-wrapper">
          <div class="switch">
            <div>Weekly</div>
            <div>Monthly</div>
          </div>
        </div>
      </div>
    </div>

    <div id="calendar">
    <?php $_smarty_tpl->_subTemplateRender("file:weekView.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>
  </div>

  <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
  <?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="template/index.js"><?php echo '</script'; ?>
>
</body>

</html><?php }
}
