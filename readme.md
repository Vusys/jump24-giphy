# GIPHY / Jump 24

## Deployment and Installation

https://laravel.com/docs/5.8/deployment

* In order for the table of random GIFs to be populated, the crontab needs to be set to call Laravel's scheduler:

     `* * * * * php /path/to/artisan schedule:run >> /dev/null 2>&1`

## Testing

Inside the the `tests` directory are three test classes. 

* `Feature/PagesTest` contains feature tests for the HTTP methods ensuring they return 200 and contain expected output.
* `Feature/PopulateRandomGifsTest` contains feature tests for the arguments for the random GIFs populate command
* `Unit/GiphyTest` contains unit tests for the Giphy API wrapper.

## SQL Benchmarking

The query to get random GIFs uses Laravel's `inRandomOrder` method which for MySQL translates into `ORDER BY rand()`. For tables with little data in them, this is fine, but in larger tables this will cause performance issues as MySQL has to scan the entire table.

Only a single query is used to update GIF filenames:

```sql
update `gifs`
set `file_name` = replace(file_name, '.gif', '_1553173472.gif')
where `file_name` not regexp '_[0-9].gif$'
```

This saves iterating over a results set or even needing to fetch a results set, at the cost of needing to scan the entire table for GIFs that don't match the renamed filename pattern. A future optimisation could be to add an indexed column to flag to the GIF to indicate if it's been renamed or not and using that in the query.

## Possible Future Improvements

* Additional tests for more coverage
* Replacing the 1st party GIPHY API library with a bespoke solution - the responses from the library omit some fields from the API, notably the title of a gif.
* Download GIFs stored in the database so that the renaming of their file names makes more sense as a feature