# Endpoints

I personally recommend [httpie](https://httpie.org/) for testing the endpoints, but `cURL`, `Insomnia`, `Postman` or any other tool is fine.

## Languages

### Get all available languages
```
http http://localhost:8888/api/v1.0/language/
```

### Get a language by ISO 639-1 Code (e.g: en, da, fi)


```
http http://localhost:8888/api/v1.0/language/de
```

```bash
HTTP/1.1 200 OK
Cache-Control: no-cache, private
Connection: close
Content-Type: application/json
Date: Sun, 12 Mar 2017 12:06:14 GMT
Host: localhost:8888
X-Powered-By: PHP/7.0.15-0ubuntu0.16.04.4

{
    "data": {
        "code": "de", 
        "id": 23, 
        "name": "German"
    }, 
    "status": {
        "code": 200
    }
}

```

If the code isn't valid, you will get a 404 error.


## Resellers

### Get all the resellers
```
http http://localhost:8888/api/v1.0/reseller/
```
```bash
HTTP/1.1 200 OK
Cache-Control: no-cache, private
Connection: close
Content-Type: application/json
Date: Sun, 12 Mar 2017 12:09:11 GMT
Host: localhost:8888
X-Powered-By: PHP/7.0.15-0ubuntu0.16.04.4

{
    "data": {
        "resellers": [
            {
                "active": true, 
                "address": "Address Uknown", 
                "default_language": "en", 
                "id": 1, 
                "name": "Reseller English", 
                "phone": "0118 999 881 999 119 725 3"
            }, 
            {
                "active": true, 
                "address": null, 
                "default_language": "da", 
                "id": 2, 
                "name": "Reseller Danish", 
                "phone": "+45 99 88 44 55"
            }, 
            {
                "active": true, 
                "address": null, 
                "default_language": "lo", 
                "id": 3, 
                "name": "Other Reseller", 
                "phone": null
            }
        ]
    }, 
    "status": {
        "code": 200
    }
}
```


## Text

```
http http://localhost:8888/api/v1.0/text/1/title/en
```
```bash
HTTP/1.1 200 OK
Cache-Control: no-cache, private
Connection: close
Content-Type: application/json
Date: Sun, 12 Mar 2017 12:15:24 GMT
Host: localhost:8888
X-Powered-By: PHP/7.0.15-0ubuntu0.16.04.4

{
    "data": {
        "text": {
            "id": 1, 
            "key": "title", 
            "language": "en", 
            "reseller": "Reseller English", 
            "value": "Title"
        }
    }, 
    "status": {
        "code": 200
    }
}
```

This endpoint contain 3 parts:
* `reseller_id`: this is the reseller ID (you can get it using the previous endpoint)
* `key`: unique key for a text 
* `language_code`: ISO 639-1 Code, if the language isn't valid you will get an error code 500, but if the language is valid there isn't a translation for that language you will get it in the default language (by Reseller) 
```
/api/v1.0/text/{reseller_id}/{key}/{language_code}
```
