import React, { Component } from 'react';
import {Link} from "react-router-dom";

class ViewProducts extends Component {
    render() { 
        return ( 
            <div className="card-body">
                <table className="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                        </tr>
                    </thead>
                    <tbody>
                    {this.props.products.map(product =>(
                        <tr key={product.id}>
                            <th scope="row">{product.id}</th>
                            <td>{product.name}</td>
                            <td>{product.email}</td>
                            <td>{product.address}</td>
                        </tr>
                    ))}
                    </tbody>
                </table>
            </div>
         );
    }
}
 
export default ViewProducts;