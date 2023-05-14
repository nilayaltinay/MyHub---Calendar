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
  <div class="row">

    {foreach from=$WeekCalendar.days item=day}
      {assign var=today value=""}
      {assign var=weekend value=""}
      {assign var=gray value=""}
      {assign var=events value="events"}

      {if isset($day.today)}
        {assign var=today value="today"}
      {/if}

      {if isset($day.weekend)}
        {assign var=weekend value="weekend"}
      {/if}

      {if isset($day.gray)}
        {assign var=gray value="gray"}
      {/if}

      {if isset($day.events)}
        {assign var=events value="events"}
      {/if}



      <div class="col p-0" style=" width: calc(100% / 7)">
        <div class="h-100 w-100 justify-content-center align-items-center d-flex day-block {$weekend} {$gray}"
          data-date="{$day.date}">
          <span class="{$today}">{$day.day}
            {* {if isset($day.events)}
            {assign var=events value="events"}
            <div class="h-100 w-100 justify-content-center align-items-center d-flex">
            <div class="dot" id="dots-{$day.date}" onclick="this.style.backgroundColor = '#a7a7a7'; this.style.color = '#ff5000';"></div> 
            </div>
          {/if} *}
          </span>
          <div class="row" style="position: absolute;margin-top: 30px;">
            {if isset($day.events)}
              {assign var=events value="events"}
              <div class="h-100 w-100 justify-content-center align-items-center d-flex">
                <div class="dot" id="dots-{$day.date}"
                  onclick="this.style.backgroundColor = '#a7a7a7'; this.style.color = '#ff5000';"></div>
              </div>
              {if isset($day.today)}
                {assign var=events value="events"}
                <div class="h-100 w-100 justify-content-center align-items-center d-none">
                  <div class="dot" id="dots-{$day.date}"
                    onclick="this.style.backgroundColor = '#a7a7a7'; this.style.color = '#ff5000';"></div>
                </div>
              {/if}
            {/if}

          </div>

        </div>


      </div>

    {/foreach}
  </div>
</div>
<div id="eventsWrap" style="border: 1px solid rgba(0, 0, 0, .125);">
  {foreach from=$WeekCalendar.days item=day}
    {if isset($day.events)}
      <div id="events-{$day.date}" class="d-none dayEvents">
        {foreach from=$day.events item=event}
          <div>
            {$event.title}
          </div>
        {/foreach}
      </div>
    {/if}
  {/foreach}
</div>
</div>