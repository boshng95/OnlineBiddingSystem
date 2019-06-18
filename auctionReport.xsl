<?xml version="1.0" encoding="utf-8"?>

<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
    xmlns="http://www.w3.org/1999/xhtml">

  <xsl:output 
    method="html" 
    indent="yes" 
    version="4.0"
    doctype-public="-//W3C//DTD HTML 4.01//EN"
    doctype-system="http://www.w3.org/TR/html4/strict.dtd"/>
    <xsl:template match="/">
        <html>
        <head>
                <link rel="stylesheet" type="text/css" href="styles/style.css" />
        </head>
            <body>
                
                <table class="border">
                <h2>SOLD / SUCCESS Bid</h2>
                    <tr>
                        <th>Listing ID</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='SOLD'">
                            <td><xsl:value-of select="listingID"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Item Name</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='SOLD'">
                            <td><xsl:value-of select="itemName"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Item Category</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='SOLD'">
                            <td><xsl:value-of select="category"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Start Price</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='SOLD'">
                            <td><xsl:value-of select="startPrice"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Reserve Price</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='SOLD'">
                            <td><xsl:value-of select="reservePrice"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Buy Now Price</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='SOLD'">
                            <td><xsl:value-of select="buyNowPrice"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Start Date</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='SOLD'">
                            <td><xsl:value-of select="startDate"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Start Time</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='SOLD'">
                            <td><xsl:value-of select="startTime"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Day</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='SOLD'">
                            <td><xsl:value-of select="day"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Hour</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='SOLD'">
                            <td><xsl:value-of select="hour"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Minute</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='SOLD'">
                            <td><xsl:value-of select="minute"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='SOLD'">
                            <td><xsl:value-of select="status"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Winning Customer</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='SOLD'">
                            <td><xsl:value-of select="winningCustomer"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Last Bid Price</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='SOLD'">
                            <td><xsl:value-of select="latestPrice"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Customer Created (ID)</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='SOLD'">
                            <td><xsl:value-of select="customerCreatedID"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <p>Total Number of Success Bid :
                    <xsl:value-of select="count(listings/listing[status='SOLD'])"/>
                    </p>
                </table>
                
                
                <table class="border">
                <h2>FAILED Bid</h2>
                    <tr>
                        <th>Listing ID</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='FAILED'">
                            <td><xsl:value-of select="listingID"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Item Name</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='FAILED'">
                            <td><xsl:value-of select="itemName"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Item Category</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='FAILED'">
                            <td><xsl:value-of select="category"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Start Price</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='FAILED'">
                            <td><xsl:value-of select="startPrice"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Reserve Price</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='FAILED'">
                            <td><xsl:value-of select="reservePrice"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Buy Now Price</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='FAILED'">
                            <td><xsl:value-of select="buyNowPrice"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Start Date</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='FAILED'">
                            <td><xsl:value-of select="startDate"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Start Time</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='FAILED'">
                            <td><xsl:value-of select="startTime"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Day</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='FAILED'">
                            <td><xsl:value-of select="day"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Hour</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='FAILED'">
                            <td><xsl:value-of select="hour"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Minute</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='FAILED'">
                            <td><xsl:value-of select="minute"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='FAILED'">
                            <td><xsl:value-of select="status"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Winning Customer</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='FAILED'">
                            <td><xsl:value-of select="winningCustomer"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Last Bid Price</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='FAILED'">
                            <td><xsl:value-of select="latestPrice"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Customer Created (ID)</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='FAILED'">
                            <td><xsl:value-of select="customerCreatedID"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <p>Total Number of Failed Bid :
                    <xsl:value-of select="count(listings/listing[status='FAILED'])"/>
                    </p>
                </table>

                <table class="border">
                <h2>In Progress Bid</h2>
                    <tr>
                        <th>Listing ID</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='In Progress'">
                            <td><xsl:value-of select="listingID"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Item Name</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='In Progress'">
                            <td><xsl:value-of select="itemName"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Item Category</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='In Progress'">
                            <td><xsl:value-of select="category"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Start Price</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='In Progress'">
                            <td><xsl:value-of select="startPrice"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Reserve Price</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='In Progress'">
                            <td><xsl:value-of select="reservePrice"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Buy Now Price</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='In Progress'">
                            <td><xsl:value-of select="buyNowPrice"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Start Date</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='In Progress'">
                            <td><xsl:value-of select="startDate"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Start Time</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='In Progress'">
                            <td><xsl:value-of select="startTime"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Day</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='In Progress'">
                            <td><xsl:value-of select="day"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Hour</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='In Progress'">
                            <td><xsl:value-of select="hour"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Minute</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='In Progress'">
                            <td><xsl:value-of select="minute"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='In Progress'">
                            <td><xsl:value-of select="status"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Winning Customer</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='In Progress'">
                            <td><xsl:value-of select="winningCustomer"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Last Bid Price</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='In Progress'">
                            <td><xsl:value-of select="latestPrice"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <tr>
                        <th>Customer Created (ID)</th>
                        <xsl:for-each select="listings/listing">        
                            <xsl:if test="status='In Progress'">
                            <td><xsl:value-of select="customerCreatedID"/></td>
                            </xsl:if>
                        </xsl:for-each>
                    </tr>
                    <p>Total Number of In Progress Bid :
                    <xsl:value-of select="count(listings/listing[status='In Progress'])"/>
                    </p>
                </table>

                <h2>
                    Total Success Bid Revenue:
                        $<xsl:value-of select="format-number(sum(listings/listing[status='SOLD']/latestPrice)*0.03 , '0.00')"/>
                </h2>
                <h2>
                    Total Failed Bid Revenue:
                        $<xsl:value-of select="format-number(sum(listings/listing[status='FAILED']/latestPrice)*0.01, '0.00')"/>
                </h2>
                <h2>
                    Total Revenue:
                        $<xsl:value-of select="format-number(sum(listings/listing[status='SOLD']/latestPrice)*0.03 + sum(listings/listing[status='FAILED']/latestPrice)*0.01, '0.00')"/>
                </h2>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>