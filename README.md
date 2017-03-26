# lej-ddd

Hello. This is just a collection of classes and interfaces useful within a
domain-driven-design context in PHP. Have fun!

## Domain event
An interface every domain event should implement. Exposes a date on which the
domain event occurred.

## Domain event publisher
A simple domain event publisher, implementing the singleton pattern to avoid
injecting into every single domain object.

## Domain event subscriber
An interface every domain event subscriber should implement. Subscribing to
DomainEvent::class acts a wildcard, all events published are passed to the
subscriber.

## Entity
An interface every entity should implement. Exposes an equals() method that can
be used to test whether two entities has the same identity.

## Id
An interface every identity should implement.

## Value object
An interface every value object should implement. Exposes an equals() method
that can be used to test whether two value objects represent the same set of
data.

## Scaffolding
To support rapid development, a few CLI commands are available to create the
most common domain objects.

- bin/console lej-ddd:create-domain-event \<domain> \<context> \<name>
- bin/console lej-ddd:create-entity \<domain> \<context> \<name>
- bin/console lej-ddd:create-string-id \<domain> \<context> \<name>
- bin/console lej-ddd:create-uuid-id \<domain> \<context> \<name>
- bin/console lej-ddd:create-value-object \<domain> \<context> \<name>

[![Build Status](https://travis-ci.org/torstenheinrich/lej-ddd.svg?branch=master)](https://travis-ci.org/torstenheinrich/lej-ddd)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/torstenheinrich/lej-ddd/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/torstenheinrich/lej-ddd/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/torstenheinrich/lej-ddd/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/torstenheinrich/lej-ddd/?branch=master)
