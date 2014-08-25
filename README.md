**What is it?**

This is an implementation of a method listener in php.  Also useful for debugging.

Features contain: 
* Make any object ReadOnly, making all all setters throw UnsupportedExceptions.
* Generate stack traces for every method call and log it to a log file.
* ...

**How it works**

Simply wrap your object like so:

This will trace the observed object. If you interested in recording all of the accessors of a method(s).

> ObjectMutation::wrapAsTraceObserver(object, outFile);

This will make the observed object readOnly. 

> ObjectMutation::wrapAsReadonlyObject(object);

