# Resources

- https://www.elastic.co/downloads/elasticsearch (Download Elasticsearch)
- https://github.com/elastic/elasticsearch-php (elasticsearch-php)
- https://packagist.org/packages/elasticsearch/elasticsearch
- https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/index.html (Full documentation)

# Notes

- GOTO URL : `localhost:9200`
- CMD : `curl -X GET "localhost:9200/?pretty"` : show details of elastic search
- CMD : `curl -X GET "localhost:9200/_search?pretty"` : show data saved
- GOTO URL : `http://localhost:9200/faker_data/faker_type_1/_search?pretty=true&q=*:*&size=1000`
- - **index** : *faker_data*
- - **type** : *faker_type_1*
- - **need to be added** : *pretty=true*
- - **need to be added** : *q=*:**
- - **get number of result** : *size=1000*
- http://localhost:9200/faker_data/_search?pretty=true&q=*:*&size=100
- http://localhost:9200/faker_data/faker_type_1/_search?pretty=true&q=*:*&size=1000
- http://localhost:9200/faker_data/faker_type_1/dIiH4XUBdBy2cmH743CC : (Specific)


# Run

- Download Elasticsearch and run batch file : `run.bat`
- Chrome settings : https://fx-development-5010443661.us-east-1.bonsaisearch.net:443
