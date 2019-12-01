import React, { Component } from 'react';
import {Link} from "react-router-dom";

class ViewAdmins extends Component {
    render() {
        return(
            <div className="card">
                <div className="card-header h2 d-flex">
                    <span className="flex-fill">Admins</span>
                    <div className="">
                        <Link to="/dashboard/admin/new">
                            <button type="button" className="btn btn-primary mx-2">New Admin</button>
                        </Link>
                    </div>
                    <div className="">
                        <Link to="/dashboard/product/new">
                            <button type="button" className="btn btn-success ml-2">New Product</button>
                        </Link>
                    </div>
                </div>
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
                        {this.props.admins.map(admin =>(
                            <tr key={admin.id}>
                                <th scope="row">{admin.id}</th>
                                <td>{admin.name}</td>
                                <td>{admin.email}</td>
                                <td>{admin.address}</td>
                            </tr>
                        ))}
                        </tbody>
                    </table>
                </div>
            </div>
        );
    }
}

export default ViewAdmins;
