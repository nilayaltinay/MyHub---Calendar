<?php
/* Smarty version 4.3.1, created on 2023-05-31 07:20:34
  from '/Applications/XAMPP/xamppfiles/htdocs/mac/degiskenler/MyHub/template/monthView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6476d922199c65_43471304',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bf34a8eed9dbd479f384bd66be069476b221d149' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/mac/degiskenler/MyHub/template/monthView.tpl',
      1 => 1685510431,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6476d922199c65_43471304 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="calendarView" class="">
    <div class="row" style="background-color: rgba(0, 0, 0, .03);border: 1px solid rgba(0, 0, 0, .125);">
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
        <?php $_smarty_tpl->_assignInScope('events', array());?>
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
            <?php $_smarty_tpl->_assignInScope('dot', '');?>

            <?php if ((isset($_smarty_tpl->tpl_vars['day']->value['today']))) {?>
                <?php $_smarty_tpl->_assignInScope('today', "today");?>
            <?php }?>

            <?php if ((isset($_smarty_tpl->tpl_vars['day']->value['weekend']))) {?>
                <?php $_smarty_tpl->_assignInScope('weekend', "weekend");?>
            <?php }?>

            <?php if ((isset($_smarty_tpl->tpl_vars['day']->value['gray']))) {?>
                <?php $_smarty_tpl->_assignInScope('gray', "gray");?>
            <?php }?>

            <div class="col p-0 day-block">
                <div id="daily" class="h-100 w-100 border border-light <?php echo $_smarty_tpl->tpl_vars['weekend']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['gray']->value;?>
" data-date="<?php echo $_smarty_tpl->tpl_vars['day']->value['date'];?>
">
                    <span class="<?php echo $_smarty_tpl->tpl_vars['today']->value;?>
" data-date="<?php echo $_smarty_tpl->tpl_vars['day']->value['date'];?>
" style="align-self: end;"><?php echo $_smarty_tpl->tpl_vars['day']->value['day'];?>
</span>



                    <?php if ((isset($_smarty_tpl->tpl_vars['day']->value['events']))) {?>
                        <?php $_smarty_tpl->_assignInScope('dot', "dot");?>
                        
                                                <?php $_smarty_tpl->_assignInScope('events', array());?>
                        <div id="events-<?php echo $_smarty_tpl->tpl_vars['event']->value;?>
" data-date="<?php echo $_smarty_tpl->tpl_vars['day']->value['date'];?>
" class="monthDayEvents">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['day']->value['events'], 'dayEvent');
$_smarty_tpl->tpl_vars['dayEvent']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['dayEvent']->value) {
$_smarty_tpl->tpl_vars['dayEvent']->do_else = false;
?>
                                
                                <div class="col-12" style="display: inline-flex;align-items: center; margin-left:5px;" >
                                <div class="<?php echo $_smarty_tpl->tpl_vars['dot']->value;?>
" data-date="<?php echo $_smarty_tpl->tpl_vars['day']->value['date'];?>
"
                                style="width: 7px; height: 7px; "></div>
                                
                                <div class="monthlyEventTitle" data-date="<?php echo $_smarty_tpl->tpl_vars['day']->value['date'];?>
" >
                                <?php echo $_smarty_tpl->tpl_vars['dayEvent']->value['title'];?>

                                </div>
                                </div>
                                

                                
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </div>

                    <?php }?>






                    

                </div>
            </div>


            <?php if ($_smarty_tpl->tpl_vars['counter']->value == 7) {?>
                <div class="">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['events']->value, 'event');
$_smarty_tpl->tpl_vars['event']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['event']->value) {
$_smarty_tpl->tpl_vars['event']->do_else = false;
?>
                        <div id="events-<?php echo $_smarty_tpl->tpl_vars['event']->value;?>
" class="d-none dayEvents">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Events']->value[$_smarty_tpl->tpl_vars['event']->value], 'dayEvent');
$_smarty_tpl->tpl_vars['dayEvent']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['dayEvent']->value) {
$_smarty_tpl->tpl_vars['dayEvent']->do_else = false;
?>
                                <div>
                                    <?php echo $_smarty_tpl->tpl_vars['dayEvent']->value['title'];?>

                                </div>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </div>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
                <?php $_smarty_tpl->_assignInScope('counter', 0);?>
                <?php $_smarty_tpl->_assignInScope('events', array());?>
            <?php } else { ?>
                <?php if ((isset($_smarty_tpl->tpl_vars['day']->value['events'])) && !empty($_smarty_tpl->tpl_vars['day']->value['events'])) {?>
                                        <?php $_tmp_array = isset($_smarty_tpl->tpl_vars['events']) ? $_smarty_tpl->tpl_vars['events']->value : array();
if (!(is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess)) {
settype($_tmp_array, 'array');
}
$_tmp_array[] = $_smarty_tpl->tpl_vars['day']->value['date'];
$_smarty_tpl->_assignInScope('events', $_tmp_array);?>
                <?php }?>
            <?php }?>

        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>




    </div>

    <div class="row" style="background-color: rgba(0, 0, 0, .03); border: 1px solid rgba(0, 0, 0, .125);">
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
