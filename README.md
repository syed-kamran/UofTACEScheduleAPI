# UofTACEScheduleAPI

This API is intended to provide anyone a clean JSON output for UofT St.George Campus Room Schedule.

The expected output for any GET request should look like this:

```
{
	"building_code": "GB"
	"room_number": "304"
	"date": "20161021"
	"schedule":	{
		"0600": "An Event",
		"0700": "Another Event",
		"0800": ""
	}
}
```
