# Extras

## Live Server

There is a server working with **AWS** and **EC2** for a faster review. Is a manual server, without CI.

```
http://ec2-35-167-98-24.us-west-2.compute.amazonaws.com/api/v1.0/reseller/
```


## Current Data

Those are the text available for testing

```sql
SELECT t.key, t.value, r.id as reseller_id, r.name as reseller_name, l.code, l.name as language_name
FROM texts t
INNER JOIN languages l on l.id = t.language_id
INNER JOIN resellers r ON r.id = t.reseller_id
```

| key         | value                                            | reseller_id | reseller_name    | language_code | language_name |
|-------------|--------------------------------------------------|-------------|------------------|---------------|---------------|
| title       | Title                                            | 1           | Reseller English | en            | English       |
| title       | Tilel                                            | 1           | Reseller English | da            | Danish        |
| title       | Título                                           | 1           | Reseller English | es            | Spanish       |
| title       | Otsikko                                          | 1           | Reseller English | fi            | Finnish       |
| title       | Titre                                            | 1           | Reseller English | fr            | French        |
| title       | DK Titel                                         | 2           | Reseller Danish  | da            | Danish        |
| book        | Book                                             | 1           | Reseller English | en            | English       |
| book        | Bog                                              | 1           | Reseller English | da            | Danish        |
| book        | Libro                                            | 1           | Reseller English | es            | Spanish       |
| test        | Test Example, a bit longer just to try the field | 1           | Reseller English | en            | English       |
| description | Description                                      | 1           | Reseller English | en            | English       |
| description | Beskrivelse                                      | 1           | Reseller English | da            | Danish        |
| description | 説明                                             | 1           | Reseller English | ja            | Japanese      |

