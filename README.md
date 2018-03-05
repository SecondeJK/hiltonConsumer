## hiltonConsumer

Quick Webapp to consume API data and output feed.

### Requirements:
This app is written for PHP7.1.
You will require Composer, PHP7+ and Docker to run. App is dev only.

### Fixtures:
The data consumer reads entries in the Feed table/repository and cycles through to generate data from the
endpoint. To create the demo's fixtures, run `bin/console app:generate-fixture`.

### Build:
Run `make build` to fire Docker composer to create a MariaDB instance.

### Spinning up:
Use `make start` to fire Docker and run the webserver.

### Spinning down:
There is no current safe way to do this. Once CMD-X has been hit to stop the container, the
built in web server is still running, so type `bin/console server:stop` to kill it.

### Container clean:
Run `make clean` to wipe the db container ready to rebuild.

### Run consumer:
Run `bin/console app:auto-consume` to cycle through the feeds to populate the db.

### View endpoint:
Access the feed at `localhost:{port}/api/v1/all`
Currently you can query the feed with the basic parameters:

```` locationName={eg. London} ````
```` sort=name:{asc|desc} ````

The app will throw uncaught exceptions if the parameters are wrong.