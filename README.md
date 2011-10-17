PhpKeyStore
===========

Description
-----------
**PhpKeyStore** (aka "PKS" but already taken) is a KeyStore (initially made for *TagPG*, another app which will come out soon) entirely in PHP... Which means, without any database.

PhpKeyStore has been made to be very simple to use and should only store Public Keys.

Examples
--------
### Registering processes:
1. You send with GET (Bad idea) or POST (That's good) 4 informations: An ID, a nickname, an email, a public key.
2. The system will generate a file with a random name. It doesn't care about existing identity, it will recreate them if necessary.
3. That's all. The server will only output the identity filename, which should be stored by your app (because you can only query for an identity, based on the filename).
4. Then, but just for yourself, you receive an e-mail, with the informations stored. You can check if everything is right, reply to ask something to the maintainer and anything else.