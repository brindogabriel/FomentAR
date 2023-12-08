var calendar;
var Calendar = FullCalendar.Calendar;
var events = [];

$(function () {
    if (!!scheds) {
        Object.keys(scheds).map((k) => {
            var row = scheds[k];
            events.push({
                id: row.id,
                title: row.title,
                start: row.start_datetime,
                end: row.end_datetime,
                priority: row.priority,
                color: row.color,
            });
        });
    }

    var date = new Date();
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear(),
        calendar = new Calendar(document.getElementById("calendar"), {
            headerToolbar: {
                left: "prev,next today",
                right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth",
                center: "title",
            },
            locale: "es",
            selectable: false,
            themeSystem: "bootstrap",
            events: events,
            eventTimeFormat: {
                hour: "2-digit",
                minute: "2-digit",
                hour12: false,
            },
            eventColor: "color",
            eventClick: function (info) {
                var details = $("#event-details-modal");
                var id = info.event.id;

                if (!!scheds[id]) {
                    details.find("#title").text(scheds[id].title);
                    details.find("#description").text(scheds[id].description);

                    details.find("#start").text(
                        new Date(scheds[id].sdate).toLocaleString("es-ES", {
                            dateStyle: "long",
                            timeStyle: "short",
                        })
                    );
                    details.find("#end").text(
                        new Date(scheds[id].edate).toLocaleString("es-ES", {
                            dateStyle: "long",
                            timeStyle: "short",
                        })
                    );
                    details.find("#priority").text(scheds[id].priority);
                    details.find("#edit,#delete").attr("data-id", id);
                    details.modal("show");
                } else {
                    alert("Event is undefined");
                }
            },
            eventDidMount: function (info) {
                // Do Something after events mounted
            },
            editable: true,
        });

    calendar.render();

    // Form reset listener
    $("#schedule-form").on("reset", function () {
        $(this).find("input:hidden").val("");
        $(this).find("input:visible").first().focus();
    });

    // Edit Button
    $("#edit").click(function () {
        var id = $(this).attr("data-id");

        if (!!scheds[id]) {
            var form = $("#schedule-form");

            console.log(
                String(scheds[id].start_datetime),
                String(scheds[id].start_datetime).replace(" ", "\\t")
            );
            form.find('[name="id"]').val(id);
            form.find('[name="title"]').val(scheds[id].title);
            form.find('[name="description"]').val(scheds[id].description);
            form.find('[name="start_datetime"]').val(
                String(scheds[id].start_datetime).replace(" ", "T")
            );
            form.find('[name="end_datetime"]').val(
                String(scheds[id].end_datetime).replace(" ", "T")
            );
            form.find('[name="color"]').val(scheds[id].color);
            $("#event-details-modal").modal("hide");
            form.find('[name="title"]').focus();
        } else {
            alert("Event is undefined");
        }
    });

    // Delete Button / Deleting an Event
    $("#delete").click(function () {
        var id = $(this).attr("data-id");

        if (!!scheds[id]) {
            var _conf = confirm("Estas seguro de borrar este evento?");
            if (_conf === true) {
                location.href = "./delete_schedule.php?id=" + id;
            }
        } else {
            alert("Event is undefined");
        }
    });
});
