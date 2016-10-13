# tripbuilder
php api demo using slim framework

send get request to tripbulder/public/api/airports
for list of all airports

send get request to tripbulder/public/api/airports/{city_name}
for list of all airports belonging to that city_name

send get request to tripbulder/public/api/customers
for list of all customers

send post request to tripbulder/public/api/customers
using keys name, username, password to create a new customer

send get request to tripbulder/public/api/flights{trip_name}
for list of all flights for a give trip name

send post request to tripbulder/public/api/flights
using keys from_id, to_id, trip_id to create a new trip
get airport by using the get request to tripbulder/public/api/airports/{city_name}

send post request to tripbulder/public/api/trips
using keys customer_id and trip_name to add a trip

send put request to tripbulder/public/api/trips{old_trip_name}
use keys old_trip_name and new_trip_name to rename the trip

send delete request to tripbulder/public/api/trips{trip_name}
use key trip_name to delete trip






