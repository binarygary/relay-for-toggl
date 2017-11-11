This project serves to act as in intermediary between Toggl and central.tri.be
As accessing Toggl directly posed some XSS hurdles I opted to write this proxy.
State and credentials are never stored. 

# POST Keys and values #

### To work with Time: ###
**request:** time
**action:** start, stop

