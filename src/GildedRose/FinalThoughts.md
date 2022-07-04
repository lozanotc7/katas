# Final thoughts on Gilded Rose Kata V2

I've ended making a deep refactor and some pretty complex modifications.

The most difficult part for me, was the "don't touch the Item Class" rule,
as I wished to add as much behaviour as possible inside my model I chose a factory and a decorator pattern approach.

I like this version better
- I've created a new Base Class and a Value Object for the quality.
- I've added an Update method to keep that logic inside my custom objects.
- I use the original objects as a feed for my own updatable objects
  and I allow to retrieve the same modified item in any moment before or after the update method calls.
- And I only interact with my Updatable Items.

So I'm still working and eventualy modifying the original items, while using Value Objects and keeping the logic inside my objects.
I'm using some inheritance, but always with abstract and final classes so i hope it's not that bad. 

Any comments are welcome.

Greetings.

# Testing

100% coverage on edited code

Method **Katas\Shared\Domain\ValueObjects\IntegerValueObject -> isBiggerThan** not tested.
