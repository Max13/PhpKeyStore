PhpKeyStore
===========

Description
-----------
**PhpKeyStore** (aka "PKS" but already taken) is a KeyStore (initially made for *TagPG*, another app which will come out soon) entirely in PHP... Which means, without any database.

PhpKeyStore has been made to be very simple to use and should only store Public Keys.

Examples
--------
### Registration process
1. You send with GET (Bad idea) or POST (That's good) 4 informations: An ID, a nickname, an email, a public key.
2. The system will generate a file with a random name. It doesn't care about existing identity, it will recreate them if necessary.
3. That's all. The server will only output the identity filename, which should be stored by your app (because you can only query for an identity, based on the filename).
4. Then, but just for yourself, you receive an e-mail, with the informations stored. You can check if everything is right, reply to ask something to the maintainer and anything else.

### Getting an identity
1. You just have to send by GET or POST, the ID returned by the server, at the registration process.
2. The identity is returned in *JSON* format.

### Updating an identity
1. This time, it's exactely the same process as the regitration step, plus the identity ID.
2. You receive a confirmation e-mail, you confirm, and the new informations are replaced.

### Deletting an identity
1. To delete an identity, you'll see, it's a little harder than earlier... Send the identity ID.
2. Receive a confirmation e-mail.
3. Confirm and your ID is deleted.

API
---
Parameters: You can send the parameters by GET, POST or BOTH. The only thing you can't do, is sending a Public Key by GET... It's too big.

### Add an identity to the KeyStore
+ Method URL: http://**PhpKeyStore_URL**/add.php
<table cellpadding="0" cellspacing="0" style="width: 100%; margin: 0px 0px 20px 0px;">
<tr>
	<td style="height: 25px; border-bottom: 1px solid #CCCCCC;">uuid</td>
	<td style="height: 25px; border-bottom: 1px solid #CCCCCC;">string</td>
	<td style="height: 25px; border-bottom: 1px solid #CCCCCC;"></td>
	<td style="height: 25px; border-bottom: 1px solid #CCCCCC;">Your internal UUID</td>
</tr>

<tr>
	<td style="height: 25px; border-bottom: 1px solid #CCCCCC;">nickname</td>
	<td style="height: 25px; border-bottom: 1px solid #CCCCCC;">string</td>
	<td style="height: 25px; border-bottom: 1px solid #CCCCCC;"></td>
	<td style="height: 25px; border-bottom: 1px solid #CCCCCC;">Will be shown when got</td>
</tr>

<tr>
	<td style="height: 25px; border-bottom: 1px solid #CCCCCC;">email</td>
	<td style="height: 25px; border-bottom: 1px solid #CCCCCC;">string</td>
	<td style="height: 25px; border-bottom: 1px solid #CCCCCC;"></td>
	<td style="height: 25px; border-bottom: 1px solid #CCCCCC;">Will be shown when got</td>
</tr>

<tr>
	<td style="height: 25px; border-bottom: 1px solid #CCCCCC;">publicKey</td>
	<td style="height: 25px; border-bottom: 1px solid #CCCCCC;">string</td>
	<td style="height: 25px; border-bottom: 1px solid #CCCCCC;"></td>
	<td style="height: 25px; border-bottom: 1px solid #CCCCCC;">Will be shown when got</td>
</tr>
</table>