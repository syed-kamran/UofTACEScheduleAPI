# UofTACEScheduleAPI

This API is intended to provide anyone a clean JSON output for UofT St.George Campus Room Schedule.

The expected output for any GET request should look like this:

```
{
	"building_code": "GB"
	"room_number": "304"
	"date": "20161021"
	"schedule":	{
		"07:00": "An Event",
		"08:00": "Another Event",
		"09:00": "",
		"10:00": "Just another event"
	}
}
```
