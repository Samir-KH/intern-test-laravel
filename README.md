# artisan command : invoice:load

This command allow to load ths csv file into a mongo db atlas cluster

## Usage

 In the CLI, type the following command

```bash
    php artisan invoice:load file.csv
```
   if the file is the correct one, the data will be loaded into the cluster and informational messages will be displayed to indicate the successful creation of the documents.
   
   Exemple:
 ```bash
    Document number 342 is created successfully !
    Document number 343 is created successfully !
    Document number 344 is created successfully !
    Document number 345 is created successfully !
    Document number 346 is created successfully !
```

# web app: 
    Visit /charts to see different charts