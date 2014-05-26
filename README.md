Magento E-Commerce - Product View Meta Description
===================================================

[![Flattr this git repo](http://api.flattr.com/button/flattr-badge-large.png)](https://flattr.com/submit/auto?user_id=dbashyal&url=https://github.com/dbashyal&title=Github Repos&language=&tags=github&category=software)

You can use this free open source magento module ( magento extension ) to fix meta description issue in Magento's product view page's meta description content.

To install, just download the code and drop at the base root of your website installation (usually public_html/ or http_docs/)

##Also includes product compare override helper

To turn off product comparision, follow these steps:

- Go to System > Configuration > Catalog
- Catalog > Recently Viewed/Compared Products
- Set 'Default Recently Compared Products' count to 0

and add these to your layout xml

```xml
<remove name="catalog.compare.sidebar"/>
<remove name="right.reports.product.compared"/>
```

##added limit option for related products.
NOTE: didn't work on enterprise, not sure if it works in community version as Enterprise has it's own related block.
if it works, then this is how you use it.

```xml
<reference name="catalog.product.related">
	<action method="setColumnCount"><columns>4</columns></action>
	<action method="setItemLimit"><type>related</type><limit>4</limit></action>
</reference>
```

###visit: http://dltr.org/ for more magento tips, tricks and codes.
