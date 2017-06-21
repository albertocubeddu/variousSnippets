#JWT Cheat Sheet

## Structure
The structure of a JWT is easy to identify: 
header.payload.signature

The **header** :  
Is composed from two part that together are encoded in base64
* Type : JWT
* Hash : (Different kind)  
```
{
  "typ": "JWT",
  "alg": "HS256"
}
```
The **payload** :   
Is carrying the informations, also called the **JWT Claims** that are reserved information used in the standard + the information that we want to pass.

####Reserved Claims
* **iss**: The issuer of the token
* **sub**: The subject of the token
* **aud**: The audience of the token
* **exp**: The expiration in timestamp of the token
* **nbf**: The timestamp that indicate the time Not Before Use
* **iat**: The time when the JWT was issued. (Used for calculate the life)
* **jti**: The unique identifier for the JWT.

The **signature**   
Is the enconding of **header**+**payload**+**secret** in the **Hash** algorithm defined in the header.


##How to use
Normally you use the JWT for authenticate your user in different microservices.   
At the login stage other offering your normal authentication procedure you add even the JWT token.  
The client then will stick it onto the **authorization** header in form of Bearer <<token>>
```
Authorization: Bearer <token>
```
As you can imagine this is a stateless authentication mechanism and doesn't require any other form of verification.  
The server receiving your JWT will have the same **secret** and will be able to decode the JWT if is still valid, correct secret, not expired and **nbf** in the past.  


