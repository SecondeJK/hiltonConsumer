## hiltonConsumer

Quick Webapp to consume API data and output feed.

### Requirements:
This app is written for PHP7.2.
You will require Composer, PHP7+, Docker (Stable) to run. App is dev only, no requirements for Prod.

### Spinning up:
App instance is spun up using a Makefile. Use make app:start to fire Docker, run migrations and install fixtures.

### Spinning down:
Use make app:clean to wipe the db container.

Progress documented here when tasks are complete - this documentation is provided primarily at the moment as a sort of diary.

---

#### Progress Update 1:
Get symfony 4 pushed, get annotations up, get a controller and output basic MVC
