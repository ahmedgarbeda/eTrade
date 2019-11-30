import React, { Component } from 'react';

class APHeader extends Component {
    render() {
        return (
            <nav className="main-header navbar navbar-expand navbar-white navbar-light">
                <ul className="navbar-nav ml-auto">
                    <li className="nav-item dropdown">
                        <a href="/logout" className="btn btn-danger">Sign Out <i className="fas fa-sign-out-alt"></i></a>
                    </li>
                </ul>
            </nav>
        );
    }
}
 
export default APHeader;