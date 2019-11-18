### Challenge Idea
We have two providers collect data from them in json files we need to read and make some filter operations on them to get the result

You can check the json files inside jsons folder
- `DataProviderX` data is stored in [DataProviderX.json]
- `DataProviderY` data is stored in [DataProviderX.json]

we have three status for `DataProviderX`
- `authorised` which will have statusCode `1`
- `decline` which will have statusCode `2`
- `refunded` which will have statusCode `3`

### Acceptance Criteria
Implement this API /api/v1/users

- it should list all users which combine transactaions from all the available providerDataProviderX and DataProviderY )
- it should be able to filter resullt by payment providers for example `/api/v1/users?provider=DataProviderX` it should return users from DataProviderX
- it should be able to filter result three statusCode (authorised, decline, refunded) for example `/api/v1/users?statusCode=authorised` 
- it should return all users from all providers that have status code authorised
- it should be able to filer by amount range for example `/api/v1/users?balanceMin=10&balanceMax=100`
- it should return result between 10 and 100 including 10 and 100
- it should be able to filer by currency
- it should be able to combine all this filter together


### DataProviderX.json
```json
{
  "users":[
    {
      "parentAmount":280,
      "Currency":"EUR",
      "parentEmail":"parent1@parent.eu",
      "statusCode":1,
      "registerationDate": "2018-11-30",
      "parentIdentification": "d3d29d70-1d25-11e3-8591-034165a3a613"

    },
    {
      "parentAmount":200.5,
      "Currency":"USD",
      "parentEmail":"parent2@parent.eu",
      "statusCode":2,
      "registerationDate": "2018-01-01",
      "parentIdentification": "e3rffr-1d25-dddw-8591-034165a3a613"

    },
    {
      "parentAmount":500,
      "Currency":"EGP",
      "parentEmail":"parent3@parent.eu",
      "statusCode":1,
      "registerationDate": "2018-02-27",
      "parentIdentification": "4erert4e-2www-wddc-8591-034165a3a613"

    },
    {
      "parentAmount":400,
      "Currency":"AED",
      "parentEmail":"parent4@parent.eu",
      "statusCode":1,
      "registerationDate": "2019-09-07",
      "parentIdentification": "d3dwwd70-1d25-11e3-8591-034165a3a613"

    },
    {
      "parentAmount":200,
      "Currency":"EUR",
      "parentEmail":"parent5@parent.eu",
      "statusCode":1,
      "registerationDate": "2018-10-30",
      "parentIdentification": "d3d29d40-1d25-11e3-8591-034165a3a6133"

    }
  ]
}
```

### DataProviderY.json
```json
{
  "users": [
    {
      "balance": 354.5,
      "currency": "AED",
      "email": "parent100@parent.eu",
      "status": 100,
      "created_at": "22/12/2018",
      "id": "3fc2-a8d1"
    },
    {
      "balance": 1000,
      "currency": "USD",
      "email": "parent200@parent.eu",
      "status": 100,
      "created_at": "22/12/2018",
      "id": "4fc2-a8d1"
    },
    {
      "balance": 560,
      "currency": "AED",
      "email": "parent300@parent.eu",
      "status": 200,
      "created_at": "22/12/2018",
      "id": "rrc2-a8d1"
    },
    {
      "balance": 222,
      "currency": "USD",
      "email": "parent400@parent.eu",
      "status": 300,
      "created_at": "11/11/2018",
      "id": "sfc2-e8d1"
    },
    {
      "balance": 130,
      "currency": "EUR",
      "email": "parent500@parent.eu",
      "status": 200,
      "created_at": "02/08/2019",
      "id": "4fc3-a8d2"
    }

  ]
}
```
