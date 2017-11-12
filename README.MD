#Central to Toggl proxy#

### Description ###
This project serves to act as in intermediary between Toggl and central.tri.be
As accessing Toggl directly posed some XSS hurdles I opted to write this proxy.
State and credentials are never stored. 
When you click start Toggl starts a timer in the format neeeded for [Aaron's python script](https://github.com/moderntribe/time-tracker-python) 
In addition it adds the project to Toggl.

### Usage ###
Set up 2 variables in the tampermonkeyscript.js file `apiKeyToggl` & `proxyURL`

##### Toggl API Key #####
Grab your [Toggl API Key](https://toggl.com/app/profile) and put it in the tampermonkeyscript.js 

##### Proxy URL #####
The easiest way to run this is to use https://relay-for-toggl.herokuapp.com/ as the proxyURL.
You could also run this php proxy youself and set the proxyURL to that.

##### Ignore the Central URL & un/pw #####
In the future this will add the ability to submit directly to central, but that is currently not included.

##### Create the new tampermonkey script #####
Paste the tampermonkey script and :metal: