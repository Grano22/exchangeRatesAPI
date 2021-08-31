package main

import (
	"reflect"
	"strconv"

)

type SDMWRequestOptions struct {
	startPeroid, endPeroid, updatedAfter, firstNObservations, lastNObservations, dimensionAtObservationdetail, detail string
	includeHistory bool
}

func generateRequest(options *SDMWRequestOptions) string {
	finalStr := "https://sdw-wsrest.ecb.europa.eu/service/schema/datastructure/ECB/ECB_EXR1/1.0?"

	fields := reflect.TypeOf(options)
	values := reflect.ValueOf(options)

	for i := 0; i < values.NumField(); i++ {
		field := fields.Field(i)
		value := values.Field(i)
		switch value.Kind() {
			case reflect.String:
				v := value.String()
			case reflect.Int:
				v := strconv.FormatInt(value.Int(), 10)
				
		}
		fieldName := field.Name
		finalStr = finalStr + fieldName + "=" + value
		if i < values.NumField() - 1 {
			finalStr += "&"
		}
        //values[i] = v.Field(i).Interface()
    }
	/*if  options.startPeroid !== "" {
		finalStr += "startPeroid" + options.startPeroid
	}*/
	return finalStr
}