<div id="calendarView" class="">
    <div class="row" style="background-color: rgba(0, 0, 0, .03);border: 1px solid rgba(0, 0, 0, .125);">
        <div class="col text-left p-2 ms-3">
            <h4>{$MonthCalendar.monthName} {$MonthCalendar.year}</h4>
        </div>
        <div class="col-auto" style="">
            <button data-date="{$MonthCalendar.previousMonthStart}" data-view="monthly"
                class="step fa-solid fa-chevron-left fa-2xl m-auto">
            </button>
        </div>

        <div class="todayButton" style="display: contents; ">
            <button type="button" id="todayButton" class="btn btn-outline-secondary btn-sm" data-view="monthly" style="background-color: #a7a7a7;align-self: center;
        border-radius: 15px;border-color: #a7a7a7;
        color: white;">Today</button>
        </div>

        <div class="col-auto" style="">
            <button data-date="{$MonthCalendar.nextMonthStart}" data-view="monthly"
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

        {assign counter 0}

        {foreach from=$MonthCalendar.days item=day}
            {assign var=counter value=$counter+1}
            {assign var=today value=""}
            {assign var=weekend value=""}
            {assign var=gray value=""}

            {if isset($day.today)}
                {assign var=today value="today"}
            {/if}

            {if isset($day.weekend)}
                {assign var=weekend value="weekend"}
            {/if}

            {if isset($day.gray)}
                {assign var=gray value="gray"}
            {/if}


            <div
                class="col border border-light justify-content-center align-items-center d-flex day-block {$weekend} {$gray}">
                <span class="{$today} ">{$day.day}</span>
            </div>

            {if $counter == 7}
                <div class=""></div>
                {assign counter 0}
            {/if}

        {/foreach}




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
</div>