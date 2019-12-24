import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import {Link} from "react-router-dom";

class Categories extends Component {
    render() { 
        return (
            <ul className="nav nav-pills nav-fill bg-secondary h4 m-0">
            {this.props.categories.map(category=>(
                <li key={category.id} className="nav-item py-2 category"
                onClick={(e)=>
                {
                    e.preventDefault();
                    this.props.selectedCategory(category)
                }}>
                    <Link to="/">
                        <span className="nav-link text-dark pointer font-weight-bolder">{category.name}</span>
                    </Link>
                </li>
            ))}
            </ul>
         );
    }
}
 
export default Categories;