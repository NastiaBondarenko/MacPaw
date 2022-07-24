Hello!

This is my version of the solution to the test task for an internship at the MacPow. 

I create a service with information about all the near-Earth objects. 


It contains a three controller:
    a route / - with a proper json return {“hello”:“MacPaw Internship 2022!“};
    a route /neo/hazardous - display all DB entries which contain potentially hazardous asteroids;
    a route /neo/fastest?hazardous=(true|false) - order by fastest asteroid, with a hazardous parameter, where true means is hazardous


Data to the database comes from requests to nasa api (https://api.nasa.gov/ -> API Name Asteroids - NeoWs). 

I used the Laravel framework and Docker to perform the task. Also, the service is covered with several simple tests.
