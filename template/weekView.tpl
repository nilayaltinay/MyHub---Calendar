<div id="calendarView" class="">
  <div class="row" style="background-color: rgba(0, 0, 0, .03);border: 1px solid rgba(0, 0, 0, .125);">
    <div class="col text-left p-2 ms-3">
      <h4>{$WeekCalendar.monthName} {$WeekCalendar.year}</h4>
    </div>
    <div class="col p-2 ms-2">
      <h4>Week {$WeekCalendar.week}</h4>
    </div>
    <div class="col-auto" style="">
      <button data-date="{$WeekCalendar.prevMonday}" data-view="weekly"
        class="step fa-solid fa-chevron-left fa-2xl m-auto">
      </button>
    </div>
    <div class="todayButton" style="display: contents; ">
      <button id="todayButton" type="button" class="btn btn-outline-secondary btn-sm" data-view="weekly" style="background-color: #a7a7a7;align-self: center;
        border-radius: 15px;border-color: #a7a7a7;
        color: white;">Today</button>
    </div>
    <div class="col-auto" style="">
      <button data-date="{$WeekCalendar.nextMonday}" data-view="weekly"
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
  <div class="daysWrap row border-bottom">

    {foreach from=$WeekCalendar.days item=day}
      {assign var=today value=""}
      {assign var=weekend value=""}
      {assign var=gray value=""}
      {assign var=dot value=""}

      {if isset($day.today)}
        {assign var=today value="today"}
      {/if}

      {if isset($day.weekend)}
        {assign var=weekend value="weekend"}
      {/if}

      {if isset($day.gray)}
        {assign var=gray value="gray"}
      {/if}


      <div class="col p-0 day-block">
        <div class="h-100 w-100 justify-content-center align-items-center d-flex flex-column  {$weekend} {$gray}"
          data-date="{$day.date}">
          <span class="{$today}" data-date="{$day.date}">{$day.day}</span>
          {if isset($day.events) && (!isset($day.today))}
            {assign var=dot value="dot"}
          {/if}
          <div class="{$dot}" data-date="{$day.date}" style="width: 7px; height: 7px; margin-top:5px;">
          </div>
        </div>
      </div>

    {/foreach}
  </div>
  <div class="eventsWrap" style="border-top: 1px solid rgba(0, 0, 0, .125); margin-left: -12px; margin-right: -12px;">
    {foreach from=$WeekCalendar.days item=day}
      {if isset($day.events)}
        <div id="events-{$day.date}" class="d-none dayEvents">
          {foreach from=$day.events item=event}
            {* <div>
              {$event.title}
            </div> *}
            <div class="row" style="margin-top: 1rem;">
              <div class="time col-1">
                <div class="start">{$event.start}</div>
                <div class="end">{$event.end}</div>
              </div>
              <div class="col-6" style="border-left: 2px solid #ff5000;">
                <div class="eventTitle">{$event.title}</div>
                <div class="eventDescription">{$event.description}</div>
              </div>

            </div>
            <hr>
          {/foreach}
        </div>
      {/if}
    {/foreach}
  </div>
</div>