<?php
/* Smarty version 4.3.1, created on 2023-05-15 02:56:43
  from '/Applications/XAMPP/xamppfiles/htdocs/mac/degiskenler/MyHub/template/weekView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6461834bc01f79_47913628',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e3e86eacc167a2674348822c47be6e026d913490' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/mac/degiskenler/MyHub/template/weekView.tpl',
      1 => 1684112201,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6461834bc01f79_47913628 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="calendarView" class="">
  <div class="row" style="background-color: rgba(0, 0, 0, .03);border: 1px solid rgba(0, 0, 0, .125);">
    <div class="col text-left p-2 ms-3" id="month">
      <h4><?php echo $_smarty_tpl->tpl_vars['WeekCalendar']->value['monthName'];?>
 <?php echo $_smarty_tpl->tpl_vars['WeekCalendar']->value['year'];?>
</h4>
    </div>
    <div class="col p-2 ms-2">
      <h4>Week <?php echo $_smarty_tpl->tpl_vars['WeekCalendar']->value['week'];?>
</h4>
    </div>
    <div class="col-auto" style="">
      <button data-date="<?php echo $_smarty_tpl->tpl_vars['WeekCalendar']->value['prevMonday'];?>
" data-view="weekly"
        class="step fa-solid fa-chevron-left fa-2xl m-auto">
      </button>
    </div>
    <div class="todayButton" style="display: contents; ">
      <button id="todayButton" type="button" class="btn btn-outline-secondary btn-sm" data-view="weekly" style="background-color: #a7a7a7;align-self: center;
        border-radius: 15px;border-color: #a7a7a7;
        color: white;">Today</button>
    </div>
    <div class="col-auto" style="">
      <button data-date="<?php echo $_smarty_tpl->tpl_vars['WeekCalendar']->value['nextMonday'];?>
" data-view="weekly"
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

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['WeekCalendar']->value['days'], 'day');
$_smarty_tpl->tpl_vars['day']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['day']->value) {
$_smarty_tpl->tpl_vars['day']->do_else = false;
?>
      <?php $_smarty_tpl->_assignInScope('today', '');?>
      <?php $_smarty_tpl->_assignInScope('weekend', '');?>
      <?php $_smarty_tpl->_assignInScope('gray', '');?>
      <?php $_smarty_tpl->_assignInScope('events', "events");?>

      <?php if ((isset($_smarty_tpl->tpl_vars['day']->value['today']))) {?>
        <?php $_smarty_tpl->_assignInScope('today', "today");?>
      <?php }?>

      <?php if ((isset($_smarty_tpl->tpl_vars['day']->value['weekend']))) {?>
        <?php $_smarty_tpl->_assignInScope('weekend', "weekend");?>
      <?php }?>

      <?php if ((isset($_smarty_tpl->tpl_vars['day']->value['gray']))) {?>
        <?php $_smarty_tpl->_assignInScope('gray', "gray");?>
      <?php }?>

      <?php if ((isset($_smarty_tpl->tpl_vars['day']->value['events']))) {?>
        <?php $_smarty_tpl->_assignInScope('events', "events");?>
      <?php }?>



      <div class="col p-0" style=" width: calc(100% / 7)">
        <div class="h-100 w-100 justify-content-center align-items-center d-flex day-block <?php echo $_smarty_tpl->tpl_vars['weekend']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['gray']->value;?>
"
          data-date="<?php echo $_smarty_tpl->tpl_vars['day']->value['date'];?>
">
          <span class="<?php echo $_smarty_tpl->tpl_vars['today']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['day']->value['day'];?>

                      </span>
          <div class="row" style="position: absolute;margin-top: 30px;">
            <?php if ((isset($_smarty_tpl->tpl_vars['day']->value['events']))) {?>
              <?php $_smarty_tpl->_assignInScope('events', "events");?>
              <div class="h-100 w-100 justify-content-center align-items-center d-flex">
                <div class="dot" id="dots-<?php echo $_smarty_tpl->tpl_vars['day']->value['date'];?>
"
                  onclick="this.style.backgroundColor = '#a7a7a7'; this.style.color = '#ff5000';"></div>
              </div>
              <?php if ((isset($_smarty_tpl->tpl_vars['day']->value['today']))) {?>
                <?php $_smarty_tpl->_assignInScope('events', "events");?>
                <div class="h-100 w-100 justify-content-center align-items-center d-none">
                  <div class="dot" id="dots-<?php echo $_smarty_tpl->tpl_vars['day']->value['date'];?>
"
                    onclick="this.style.backgroundColor = '#a7a7a7'; this.style.color = '#ff5000';"></div>
                </div>
              <?php }?>
            <?php }?>

          </div>

        </div>


      </div>

    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </div>
</div>
<div id="eventsWrap" style="border: 1px solid rgba(0, 0, 0, .125);">
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['WeekCalendar']->value['days'], 'day');
$_smarty_tpl->tpl_vars['day']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['day']->value) {
$_smarty_tpl->tpl_vars['day']->do_else = false;
?>
    <?php if ((isset($_smarty_tpl->tpl_vars['day']->value['events']))) {?>
      <div id="events-<?php echo $_smarty_tpl->tpl_vars['day']->value['date'];?>
" class="d-none dayEvents">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['day']->value['events'], 'event');
$_smarty_tpl->tpl_vars['event']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['event']->value) {
$_smarty_tpl->tpl_vars['event']->do_else = false;
?>
          <div>
            <?php echo $_smarty_tpl->tpl_vars['event']->value['title'];?>

          </div>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </div>
    <?php }?>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>
</div><?php }
}
