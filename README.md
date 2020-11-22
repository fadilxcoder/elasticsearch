# Resources

- https://www.elastic.co/downloads/elasticsearch (Download Elasticsearch)
- https://github.com/elastic/elasticsearch-php (elasticsearch-php)
- https://packagist.org/packages/elasticsearch/elasticsearch

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

# Docker

- Build project : `docker-compose up --build`
- Connect to `php-fpm` (fx_php_fpm) terminal
- - CMD : `composer install`
- - To view host file, use command : ` cat /etc/hosts`
- Change elastic search connection details :
- - `$hosts = [ '172.18.0.1:9200'];` (example)
- - `$hosts = [ 'xxx.xx.x.x:9200'];` where xxx is the IP of **fx_nginx** in docker logs when built.
- Populate elastic search : RUN file `insert-to-es.php`

# Run

- Download Elasticsearch and run batch file : `run.bat`

# Usage

- file : `search.php`
- search by **name** or **description**
- Possible test data :
- - *description* : **blanditiis**
- - *name* : **murazik**
- - *description* : **recusandae**