# Sample export connector for VTEX

Sample connector to showcase how export conenctors work.

[Documentation](https://cde.productsup.com/docs/developers/guide/index.html)

### Basic flow
  * Configuration of the conenctor is passed via env variables
  * Read the products from Container API
  * Denormalize to `\App\VtexClient\Model\FulfillmentOrder` DTO
  * Push to VTEX API via `\App\VtexClient\MarketplaceApi`

### How to continue?
In case of fulfilment export:
  * Check VTEX API calls and make them succeed
  * Aggregate together same orders
  * Deal with failed orders -> push them to feedback file & fail the export