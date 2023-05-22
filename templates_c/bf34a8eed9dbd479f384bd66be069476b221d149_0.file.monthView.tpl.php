<?php
/* Smarty version 4.3.1, created on 2023-05-22 08:49:37
  from '/Applications/XAMPP/xamppfiles/htdocs/mac/degiskenler/MyHub/template/monthView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_646b1081a739b7_14005954',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bf34a8eed9dbd479f384bd66be069476b221d149' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/mac/degiskenler/MyHub/template/monthView.tpl',
      1 => 1684738174,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_646b1081a739b7_14005954 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="calendarView" class="">
    <div class="row" style="background-color: rgba(0, 0, 0, .03);border-top: 1px solid rgba(0, 0, 0, .125); border-bottom: 1px solid rgba(0, 0, 0, .125);">
        <div class="col text-left p-2 ms-3">
            <h4><?php echo $_smarty_tpl->tpl_vars['MonthCalendar']->value['monthName'];?>
 <?php echo $_smarty_tpl->tpl_vars['MonthCalendar']->value['year'];?>
</h4>
        </div>
        <div class="col-auto" style="">
            <button data-date="<?php echo $_smarty_tpl->tpl_vars['MonthCalendar']->value['previousMonthStart'];?>
" data-view="monthly"
                class="step fa-solid fa-chevron-left fa-2xl m-auto">
            </button>
        </div>

        <div class="todayButton" style="display: contents; ">
            <button type="button" id="todayButton" class="btn btn-outline-secondary btn-sm" data-view="monthly" style="background-color: #a7a7a7;align-self: center;
        border-radius: 15px;border-color: #a7a7a7;
        color: white;">Today</button>
        </div>

        <div class="col-auto" style="">
            <button data-date="<?php echo $_smarty_tpl->tpl_vars['MonthCalendar']->value['nextMonthStart'];?>
" data-view="monthly"
                class="step fa-solid fa-chevron-right fa-2xl m-auto">
            </button>
        </div>

    </div>

    <div class="row border-bottom">

        <div class="col text-center py-3">Mo</div>
        <div class="col text-center py-3">Tu</div>
        <div class="col text-center py-3">We</div>
        <div class="col text-center py-3">Th</div>
        <div class="col text-center py-3">Fr</div>
        <div class="col text-center weekend py-3">Sa</div>
        <div class="col text-center weekend py-3">Su</div>

    </div>
    <div class="row">

        <?php $_smarty_tpl->_assignInScope('counter', 0);?>

        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['MonthCalendar']->value['days'], 'day');
$_smarty_tpl->tpl_vars['day']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['day']->value) {
$_smarty_tpl->tpl_vars['day']->do_else = false;
?>
            <?php $_smarty_tpl->_assignInScope('counter', $_smarty_tpl->tpl_vars['counter']->value+1);?>
            <?php $_smarty_tpl->_assignInScope('today', '');?>
            <?php $_smarty_tpl->_assignInScope('weekend', '');?>
            <?php $_smarty_tpl->_assignInScope('gray', '');?>

            <?php if ((isset($_smarty_tpl->tpl_vars['day']->value['today']))) {?>
                <?php $_smarty_tpl->_assignInScope('today', "today");?>
            <?php }?>

            <?php if ((isset($_smarty_tpl->tpl_vars['day']->value['weekend']))) {?>
                <?php $_smarty_tpl->_assignInScope('weekend', "weekend");?>
            <?php }?>

            <?php if ((isset($_smarty_tpl->tpl_vars['day']->value['gray']))) {?>
                <?php $_smarty_tpl->_assignInScope('gray', "gray");?>
            <?php }?>


            <div
                class="col border border-light justify-content-center align-items-center d-flex day-block <?php echo $_smarty_tpl->tpl_vars['weekend']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['gray']->value;?>
">
                <span class="<?php echo $_smarty_tpl->tpl_vars['today']->value;?>
 "><?php echo $_smarty_tpl->tpl_vars['day']->value['day'];?>
</span>
            </div>

            <?php if ($_smarty_tpl->tpl_vars['counter']->value == 7) {?>
                <div class=""></div>
                <?php $_smarty_tpl->_assignInScope('counter', 0);?>
            <?php }?>

        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>




    </div>

    <div class="row" style="background-color: rgba(0, 0, 0, .03); border-top: 1px solid rgba(0, 0, 0, .125); border-bottom: 1px solid rgba(0, 0, 0, .125);">
        <div class="col text-center p-2 ms-3">
            <p style="font-size: x-small; margin-top: revert;">Times shown are local times based on campus location, or
                Sydney time if class
                is Online</p>
        </div>

        <div class="col-auto" style="">
            <button data-view="monthly" class="step fa-solid fa-print m-auto" onClick="window.print()">
            </button>
        </div>

    </div>
</div><?php }
}
