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
        {assign var="events" value=[] }
        {foreach from=$MonthCalendar.days item=day}
            {assign var=counter value=$counter+1}
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
                <div id="daily" class="h-100 w-100 border border-light {$weekend} {$gray}" data-date="{$day.date}">
                    <span class="{$today}" data-date="{$day.date}" style="align-self: end;">{$day.day}</span>



                    {if isset($day.events) }
                        {assign var=dot value="dot"}
                        {* <div class="{$dot}" data-date="{$day.date}"
                            style="width: 7px; height: 7px; margin-top:5px; display:none">
                        </div> *}

                        {* {foreach from=$events item=event}
                        {/foreach} *}
                        {assign var="events" value=[] }

                        <div id="events-{$event}" data-date="{$day.date}" class="dayEvents" style="display: contents;">
                            {foreach from=$day.events item=dayEvent}

                                {* <div class="{$dot}" data-date="{$day.date}" style="width: 7px; height: 7px; ">
                                    </div>

                                    <div class="monthlyEventTitle" data-date="{$day.date}">
                                        {$dayEvent.title}
                                    </div> *}

                                <!-- DOT trigger modal -->
                                <div class="col-12"
                                    style="display: inline-flex;align-items: center; margin-left:5px; cursor: pointer;"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <div class="{$dot}" data-date="{$day.date}" style="width: 7px; height: 7px; ">
                                    </div>
                                    <div class="monthlyEventTitle" data-date="{$day.date}">
                                        {$dayEvent.title}
                                    </div>
                                </div>


                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">{$day.date}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <!-- Events -->
                                                {if isset($day.events)}
                                                    {assign var="events" value=[] }

                                                    <div id="events-{$day.date}" class="dayEvents">
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
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            {/foreach}
                        </div>

                    {/if}






                    {* <div class="{$dot}" data-date="{$day.date}" style="width: 7px; height: 7px; margin-top:5px;">
                    </div> *}


                </div>
            </div>


            {if $counter == 7}
                <div class="">
                    {foreach from=$events item=event}
                        <div id="events-{$event}" class="d-none dayEvents">
                            {foreach from=$Events[$event] item=dayEvent}
                                <div>
                                    {$dayEvent.title}
                                </div>
                            {/foreach}
                        </div>
                    {/foreach}
                </div>
                {assign counter 0}
                {assign var="events" value=[] }
            {else}
                {if isset($day.events) && !empty($day.events)}
                    {* {assign 'events' $events|array_merge:$day.date} *}
                    {append var="events" value=$day.date }
                {/if}
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

<script>
    const myModal = document.getElementById('myModal')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus()
        }) <
script >