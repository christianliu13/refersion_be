# refersion_be

currently set up to handle a shopify create product webhook and calls a Refersion API call to associate the product SKU with the affiliate id.

SETUP:
1. Start the php local server at localhost:8080
  php -S localhost:8080
  
2. Install ngrok, then start ngrok on 8080
  ngrok http 8080
  
3. Ngrok should return a secure url (https://).  Copy that url and create a products/create webhook in shopify with this url.

  [ngrok_secure_url]/webhook/products/create
  
  ex)https://10409624f71e.ngrok.io/webhook/products/create
  
4. Create a product in Shopify


NOTES:
* There is code to create a webhook in this repo.  However, since I am following the requirements and using Refersion's Shopify, I didn't want to make a shopify app.  The code would make a webhook(in theory) if this repo were a Shopify app.
