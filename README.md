GptGeonames
================

 Symfony bundle. Define entities to store data from Geonames in tables
 for Country, Admin1, Admin2, Admin3, geonames.
 
 Use [GeonamesDump](https://github.com/mitridates/Geonamesdump) to load data.
 
 This bundle only define entities and repositories.

## Require

[GeonamesDump](https://github.com/mitridates/GeonamesDump) to load data.

## Install

### Get the Bundle and load tables

    git clone git://github.com/mitridates/GeonamesDump.git

### Add to config/bundles.php
    ...
    App\Geonames\Geonames::class => ['all' => true];
    
### Update Schema

    # Generate tables geonames_country, geonames_admin1, geonames_admin2, geonames_admin3, geonames_geonames
    # test: bin/console doctrine:schema:update --dump-sql
    bin/console doctrine:schema:update --force

### Load data
    
Download, configure and run [GeonamesDump](https://github.com/mitridates/GeonamesDump) 
console command to load administrative divisions.

Once the data is loaded, GeonamesDump is no longer required. Remove entry in bundles.php and folder 


## See

[http://download.geonames.org/export/dump/](http://download.geonames.org/export/dump/)

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.