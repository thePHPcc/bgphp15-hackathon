# Hackathon @ Bulgaria PHP Conference 2015

Code written during the hackathon at Bulgaria PHP Conference 2015.

This is example code that is not production-ready. It is intended for studying and learning purposes.

## Original Requirements

Most shipping companies provide some form of tracking service, where a container can be traced by its identification number. Your task is to implement a very cool container tracking web application, which relies on live GPS data (coordinates) from a web service. The service needs to accept a container tracking number (a.k.a. container ID) and be able to visualise the location of the corresponding container (preferrably on a map). The UI of your web app is totally up to you.

Since most of us have had the unpleasant experience of working with APIs with poor design or bad formatting/validation, your team also gets to implement the API part of the task to your liking. It has to provide simple funcionality. It accepts only two calls:

* A call for registering new container (accepts container identification string, returns boolean result)
* A call for obtaining the current GPS coordinates of a container (accepts container ID string, returns GPS coordinates string(s))

You can format the request/response any way you like. For example, you can return the GPS coordinates for the second call as an array of two strings, encoded in json, or you can choose to use some form of special formatting - it's all up to your team's decision. Our sponsors from KYUP have provided free accounts for their LXC-based cloud service, where you can spawn a new virtual container to host your API.

## Changed Requirements

We do not want the client (user) to specify a container tracking number. We auto-generate it on container registration.

### Reasoning

When the client specifies the number, we have no real control over the format of the tracking number,
e.g. if we want to add a checksum in the future

When the client specifies the number, it is more difficult to ensure uniqueness (as opposed to us generating the number,
and using a number generator that guarantees uniqueness).

Not accepting a user-generated input also increases security, since we are in full control over which characters
we use in the tracking number.

### Change to proposed API

Client does not need to specify container tracking number ("id"), we pass it back on container registration.

No need for a boolean return value (which would not allow us to communicate back *why* container registration has
failed, and is thus a bad design decision).

If customers (also) need a readable name for the container, we can make it possible later for them to specify one.
This name does not have to be globally unique, however, from our viewpoint it us just an arbitrary string.

