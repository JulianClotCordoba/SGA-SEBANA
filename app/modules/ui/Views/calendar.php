<?php
ob_start();
?>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">calendar</h2>
                                    <button class="au-btn au-btn-icon au-btn--blue" onclick="addNewEvent()">
                                        <i class="zmdi zmdi-plus"></i>add event</button>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-lg-9">
                                <div class="au-card">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 m-b-40">Event Calendar</h3>
                                        <div id="calendar" class="calendar-container"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <!-- UPCOMING EVENTS -->
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 m-b-30">Upcoming Events</h3>
                                        <div class="upcoming-events">
                                            <div class="event-item d-flex align-items-start mb-3 p-3 border rounded">
                                                <div class="event-date text-center me-3">
                                                    <div class="fs-6 fw-bold text-primary">JAN</div>
                                                    <div class="fs-4 fw-bold">25</div>
                                                </div>
                                                <div class="event-details flex-grow-1">
                                                    <h6 class="mb-1">Team Meeting</h6>
                                                    <small class="text-muted">9:00 AM - 10:30 AM</small>
                                                    <div class="mt-1">
                                                        <span class="badge bg-primary">Meeting</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="event-item d-flex align-items-start mb-3 p-3 border rounded">
                                                <div class="event-date text-center me-3">
                                                    <div class="fs-6 fw-bold text-success">JAN</div>
                                                    <div class="fs-4 fw-bold">28</div>
                                                </div>
                                                <div class="event-details flex-grow-1">
                                                    <h6 class="mb-1">Project Deadline</h6>
                                                    <small class="text-muted">All Day</small>
                                                    <div class="mt-1">
                                                        <span class="badge bg-danger">Deadline</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="event-item d-flex align-items-start mb-3 p-3 border rounded">
                                                <div class="event-date text-center me-3">
                                                    <div class="fs-6 fw-bold text-info">FEB</div>
                                                    <div class="fs-4 fw-bold">02</div>
                                                </div>
                                                <div class="event-details flex-grow-1">
                                                    <h6 class="mb-1">Client Presentation</h6>
                                                    <small class="text-muted">2:00 PM - 3:30 PM</small>
                                                    <div class="mt-1">
                                                        <span class="badge bg-info">Presentation</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- CALENDAR LEGEND -->
                                <div class="au-card">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 m-b-30">Event Types</h3>
                                        <div class="calendar-legend">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="legend-color bg-primary rounded me-2" style="width: 16px; height: 16px;"></div>
                                                <span class="fs-6">Meetings</span>
                                            </div>
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="legend-color bg-success rounded me-2" style="width: 16px; height: 16px;"></div>
                                                <span class="fs-6">Tasks</span>
                                            </div>
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="legend-color bg-warning rounded me-2" style="width: 16px; height: 16px;"></div>
                                                <span class="fs-6">Appointments</span>
                                            </div>
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="legend-color bg-danger rounded me-2" style="width: 16px; height: 16px;"></div>
                                                <span class="fs-6">Deadlines</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="legend-color bg-info rounded me-2" style="width: 16px; height: 16px;"></div>
                                                <span class="fs-6">Presentations</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2025 Colorlib. All rights reserved. Template by <a href="https://colorlib.com" rel="nofollow" target="_blank">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>

    <!-- FullCalendar Bootstrap 5 integration Styles -->
    <style type="text/css">
    .fc-theme-standard .fc-view-harness {
        border: none;
    }
    .fc-theme-standard .fc-scrollgrid {
        border: 1px solid var(--bs-border-color);
        border-radius: 0.375rem;
    }
    .fc .fc-button-primary {
        background-color: var(--bs-primary);
        border-color: var(--bs-primary);
        color: #fff;
    }
    .fc .fc-button-primary:hover {
        background-color: var(--bs-primary);
        border-color: var(--bs-primary);
        opacity: 0.9;
    }
    .fc-theme-standard .fc-header-toolbar {
        margin-bottom: 1rem;
    }
    .fc-event {
        border-radius: 0.25rem;
        border: none !important;
        font-size: 0.875rem;
    }
    .fc-daygrid-event {
        margin: 2px 4px;
    }
    </style>

    <!-- FullCalendar v6.1.11 -->
    <script src="/SGA-SEBANA/public/assets/vendor/fullcalendar-6.1.11/fullcalendar.min.js"></script>

    <!-- Calendar Initialization -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('calendar');
        
        if (calendarEl) {
            // Sample events data using modern date handling
            const today = new Date();
            const tomorrow = new Date(today);
            tomorrow.setDate(today.getDate() + 1);
            
            const nextWeek = new Date(today);
            nextWeek.setDate(today.getDate() + 7);
            
            const events = [
                {
                    title: 'Team Meeting',
                    start: '2025-01-25T09:00:00',
                    end: '2025-01-25T10:30:00',
                    backgroundColor: '#007bff',
                    borderColor: '#007bff',
                    textColor: '#ffffff',
                    extendedProps: {
                        type: 'meeting',
                        description: 'Weekly team sync meeting'
                    }
                },
                {
                    title: 'Project Deadline',
                    start: '2025-01-28',
                    allDay: true,
                    backgroundColor: '#dc3545',
                    borderColor: '#dc3545',
                    textColor: '#ffffff',
                    extendedProps: {
                        type: 'deadline',
                        description: 'Final submission deadline'
                    }
                },
                {
                    title: 'Client Presentation',
                    start: '2025-02-02T14:00:00',
                    end: '2025-02-02T15:30:00',
                    backgroundColor: '#17a2b8',
                    borderColor: '#17a2b8',
                    textColor: '#ffffff',
                    extendedProps: {
                        type: 'presentation',
                        description: 'Quarterly review presentation'
                    }
                },
                {
                    title: 'Doctor Appointment',
                    start: '2025-01-30T11:00:00',
                    end: '2025-01-30T12:00:00',
                    backgroundColor: '#ffc107',
                    borderColor: '#ffc107',
                    textColor: '#000000',
                    extendedProps: {
                        type: 'appointment',
                        description: 'Annual health checkup'
                    }
                },
                {
                    title: 'Development Task',
                    start: '2025-01-27T10:00:00',
                    end: '2025-01-27T16:00:00',
                    backgroundColor: '#28a745',
                    borderColor: '#28a745',
                    textColor: '#ffffff',
                    extendedProps: {
                        type: 'task',
                        description: 'Feature implementation'
                    }
                },
                {
                    title: 'Conference Call',
                    start: '2025-02-05T15:00:00',
                    end: '2025-02-05T16:00:00',
                    backgroundColor: '#007bff',
                    borderColor: '#007bff',
                    textColor: '#ffffff',
                    extendedProps: {
                        type: 'meeting',
                        description: 'International team sync'
                    }
                }
            ];

            // Initialize FullCalendar v6+
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                height: 'auto',
                events: events,
                eventDisplay: 'block',
                dayMaxEvents: 3,
                moreLinkText: 'more',
                
                // Event click handler
                eventClick: function(info) {
                    const event = info.event;
                    const props = event.extendedProps;
                    
                    alert(`Event: ${event.title}\n` +
                          `Type: ${props.type || 'N/A'}\n` +
                          `Description: ${props.description || 'No description'}\n` +
                          `Start: ${event.start ? event.start.toLocaleString() : 'N/A'}\n` +
                          `End: ${event.end ? event.end.toLocaleString() : 'N/A'}`);
                },
                
                // Date click handler for adding new events
                dateClick: function(info) {
                    const title = prompt('Enter event title:');
                    if (title) {
                        calendar.addEvent({
                            title: title,
                            start: info.date,
                            allDay: info.allDay,
                            backgroundColor: '#6c757d',
                            borderColor: '#6c757d',
                            textColor: '#ffffff'
                        });
                    }
                },
                
                // Responsive behavior
                windowResize: function() {
                    calendar.updateSize();
                }
            });

            calendar.render();
            
            // Store calendar instance globally for external access
            window.calendarInstance = calendar;
        }
    });
    
    // Function for "Add Event" button
    function addNewEvent() {
        const title = prompt('Enter event title:');
        if (title && window.calendarInstance) {
            const today = new Date();
            window.calendarInstance.addEvent({
                title: title,
                start: today,
                backgroundColor: '#6c757d',
                borderColor: '#6c757d',
                textColor: '#ffffff',
                extendedProps: {
                    type: 'custom',
                    description: 'User created event'
                }
            });
        }
    }
    </script>

<?php
$content = ob_get_clean();
require BASE_PATH . '/public/templates/base.html.php';
?>