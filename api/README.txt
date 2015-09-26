Changed requirements:

We do not want the client (user) to specify a container tracking number. We auto-generate it on container registration.

Reasoning:

When the client specifies the number, we have no real control over the format of the tracking number,
e.g. if we want to add a checksum in the future

When the client specifies the number, it is more difficult to ensure uniqueness (as opposed to us generating the number,
and using a number generator that guarantees uniqueness).

Not accepting a user-generated input also increases security, since we are in full control over which characters
we use in the tracking number.

Change to proposed API:

Client does not need to specify container tracking number ("id"), we pass it back on container registration.

No need for a boolean return value (which would not allow us to communicate back *why* container registration has
failed, and is thus a bad design decision).

If customers (also) need a readable name for the container, we can make it possible later for them to specify one.
This name does not have to be globally unique, however, from our viewpoint it us just an arbitrary string.
