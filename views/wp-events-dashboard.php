<div class="wrap">
    <h2>Event Dashboard</h2></div>

    <div id='calendar'></div>
	
	   <script>
            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                    },
                    initialDate: '2024-05-01',
                    navLinks: true, // can click day/week names to navigate views
                    businessHours: true, // display business hours
                    editable: true,
                    selectable: true,
                    events: [
                        <?php $args = array(
                            'post_type' => 'wph_event',
                            'posts_per_page' => -1,
                        );
                        $events_query = new \WP_Query($args);
                        if ($events_query->have_posts()) {
                            while ($events_query->have_posts()) {
                                $events_query->the_post();
                                $title = get_the_title();
                                $start_date = get_post_meta(get_the_ID(), 'datepicker', true);
                                $formatted_date = date("Y-m-d", strtotime($start_date));
                                $start_date2 = get_post_meta(get_the_ID(), 'datepicker2', true);
                                $formatted_date2 = date("Y-m-d", strtotime($start_date2));
                                $url = get_the_permalink();
                                ?> {
                                    title: '<?php echo addslashes($title); ?>',
                                    url: '<?php echo addslashes($url); ?>',
                                    start: '<?php echo addslashes($formatted_date); ?>',
                                    end: '<?php echo addslashes($formatted_date2); ?>',
                                },
                            <?php }
                            wp_reset_postdata();
                        } ?>
                    ]
                });
                calendar.render();
            });
        </script>