**What is it?**

This is an implementation of a method listener in php.  This allows for extending the behaviour of your classes without having them extend specific classes. 

Classic composition is used to wrap the object, all method calls are caught so you can extend the behaviour none the less.

Features contain: 
* Make any object ReadOnly, making all setters throw UnsupportedExceptions.
* Generate stack traces for every method call and log it to a log file.
* ...

**How it works**

Simply wrap your object like so:

This will trace the observed object. If you interested in recording all of the accessors of a method(s).

> $object = ObjectMutation::wrapAsTraceObserver($object, $outFile);

This will make the observed object readOnly. 

> $object = ObjectMutation::wrapAsReadonlyObject($object);

You can also make your own implementations of method listeners.


