function calendario(obj){
    var event = obj.calendar;
    var eventsInline = [{ event }];
    $('#calendar').eventCalendar({
        jsonData: eventsInline
    });
};